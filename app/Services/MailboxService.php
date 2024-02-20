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
            // Search in mailbox folder for specific emails
            // PHP.net imap_search criteria: http://php.net/manual/en/function.imap-search.php
            // Here, we search for "all" emails
            $mails_ids = $mailbox->searchMailbox('ALL');
        } catch(ConnectionException $ex) {
            die();
        }
        
        // Change default path delimiter '.' to '/'
        $mailbox->setPathDelimiter('/');
        
        // Switch server encoding
        $mailbox->setServerEncoding('UTF-8');
        $mailbox->setAttachmentsIgnore(true);
        
        foreach($mails_ids as $mail_id) {
            
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
            
            if(!empty($email->autoSubmitted)) {
                // Mark email as "read" / "seen"
                $mailbox->markMailAsRead($mail_id);
            }
            
            if(!empty($email->precedence)) {
                // Mark email as "read" / "seen"
                $mailbox->markMailAsRead($mail_id);
            }
            $mailbox->markMailAsRead($mail_id);
        }
        
        // Disconnect from mailbox
        $mailbox->disconnect();
        
    }
   
}