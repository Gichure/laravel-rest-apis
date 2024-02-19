<?php

namespace App\Services;
use App\Repositories\TaskRepository;
use PhpImap\Mailbox;
use PhpImap\Exceptions\ConnectionException;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 *
 * @author Paul
 *
 */
class MailboxService implements MailboxServiceI
{
    
    private $repository;
    
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function checkEmail(){
        $mailbox = new Mailbox(
            '{mail.paurushsolutions.com:993/imap/ssl}INBOX',
            env('MAIL_USERNAME'),
            env('MAIL_PASSWORD'),
            __DIR__,
            'US-ASCII'
            );
        try {
            echo "+------ CONNECTING  ------+\n";
            // Search in mailbox folder for specific emails
            // PHP.net imap_search criteria: http://php.net/manual/en/function.imap-search.php
            // Here, we search for "all" emails
            $mails_ids = $mailbox->searchMailbox('ALL');
        } catch(ConnectionException $ex) {
            echo "IMAP connection failed: " . $ex;
            die();
        }
        
        // Change default path delimiter '.' to '/'
        $mailbox->setPathDelimiter('/');
        
        // Switch server encoding
        $mailbox->setServerEncoding('UTF-8');
        $mailbox->setAttachmentsIgnore(true);
        
        foreach($mails_ids as $mail_id) {
            // Just a comment, to  see, that this is the begin of an email
            echo "+------ P A R S I N G ------+\n";
            
            // Get mail by $mail_id
            $email = $mailbox->getMail(
                $mail_id, // ID of the email, you want to get
                false // Do NOT mark emails as seen
                );
            
            $this->repository->create([
                'title' => $email->subject,
                'description' =>  Str::limit($email->textHtml ? $email->textHtml : $email->textPlain,4000,'...') ,
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now()->addDays(1),
                'task_priority' => 'HIGH',
                'task_status' => 'PENDING',
                'task_type' => 'PUBLIC',
                'employee_id' => 1,
                'user_group_id' => 1,
                'created_by_id' => 1   
            ]);
           // var_dump($email->to);
            echo "\nfrom-name: " . (isset($email->fromName)) ? $email->fromName : $email->fromAddress;
            echo "\nfrom-email: " . $email->fromAddress;
            //echo "\nto: " . $email->to;
            echo "\nsubject: " . $email->subject;
            echo "\nmessage_id: " . $email->messageId;
            
            echo "\nmail has attachments? ";
            if($email->hasAttachments()) {
                echo "Yes\n";
            } else {
                echo "No\n";
            }
            
            if(!empty($email->getAttachments())) {
                echo count($email->getAttachments()) . " attachements";
            }
            if($email->textHtml) {
                echo "Message HTML:\n" . $email->textHtml;
            } else {
                echo "Message Plain:\n" . $email->textPlain;
            }
            
            if(!empty($email->autoSubmitted)) {
                // Mark email as "read" / "seen"
                $mailbox->markMailAsRead($mail_id);
                echo "+------ IGNORING: Auto-Reply ------+";
            }
            
            if(!empty($email->precedence)) {
                // Mark email as "read" / "seen"
                
                echo "+------ IGNORING: Non-Delivery Report/Receipt ------+";
            }
            $mailbox->markMailAsRead($mail_id);
        }
        
        // Disconnect from mailbox
        $mailbox->disconnect();
        
    }
   
}