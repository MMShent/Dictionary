<?php
class Tools
{

  public static $my_email = 'ivan.shentov@mentormate.com';
  public static $dan_email = 'dan@skdtac.com';

  public static function configMail($from, $subject, $plainContent, $htmlContent, $recipients)
  {
    $mail = new PHPMailer();
    $mail->ContentType = 'text/html';

    $mail->SetFrom($from);

    $recipients = explode(',', $recipients);

    if(count($recipients) > 1)
    {
      foreach ($recipients as $recipient)
      {
        $mail->AddAddress($recipient);
      }
    }else
    {
      $mail->AddAddress($recipients[0]);
    }

    // Add copy to all mails for Me
    $mail->AddAddress('shentov@gmail.com');

    // Set up everything else
    $mail->Subject = $subject;
    $mail->AltBody = $plainContent;
    $mail->MsgHTML($htmlContent);

    return $mail->Send();
  }
  
  public static function sendVerificationEmail($data)
  {
    // $data[int]
    // 0 - Recipient
    // 1 - id of the Term
    $recipientsArray = array("$data[0]");
    $recipients = implode(',', $recipientsArray);
  	$subject = '[Wiki] - term submition verification';
    // hash the email + !! + term id
    $hash = base64_encode($data[0].'!!'.$data[1]);
    
    $body = 'Thank you for considering <em>Wiki</em> for your needs.<br />'."\r\n";
    $body .= '<br /><br />'."\r\n";
    $body .= 'In order to publish your term you have to confirm by pressing the link below or copy/paste it in the address bar of your browser.<br /><br />'."\r\n";
    $body .= 'Verify link:'."\r\n";
    $body .= '<a href="http://tacticaldictionary.com/verify/'.$hash.'">http://tacticaldictionary.com/verify/'.$hash.'</a><br /><br />'."\r\n";
    $body .= 'Edit link:'."\r\n";
    $body .= '<a href="http://tacticaldictionary.com/edit/'.$hash.'">http://tacticaldictionary.com/edit/'.$hash.'</a><br /><br />'."\r\n";

    $plainContent = "Thank you for considering <em>Wiki</em> for your needs.\r\n
\r\n
In order to publish your term you have to confirm by pressing the link below or copy/paste it in the address bar of your browser.\r\n

Verify link:
http://tacticaldictionary.com/verify/$hash
    
Edit link:
http://tacticaldictionary.com/edit/$hash
\r\n
\r\n
Thanks!\r\n";

    self::configMail(self::$dan_email, $subject, $plainContent, $body, $recipients);
  }

  public static function sendInformationEmail()
  {
    $recipientsArray = array(self::$my_email, self::$dan_email);
    $recipients = implode(',', $recipientsArray);
  	$subject = '[Wiki] - New term submition';
    
    $body = 'New term was just submitted for approval.<br />'."\r\n";
    $body .= '<br /><br />'."\r\n";
    $body .= 'In order to publish it you have to approve it by pressing the link below or copy/paste it in the address bar of your browser.<br />'."\r\n";

    $body .= '<a href="http://tacticaldictionary.com/approve">http://tacticaldictionary.com/approve</a><br /><br />'."\r\n";


    $plainContent = "In order to publish it you have to approve it by pressing the link below or copy/paste it in the address bar of your browser.
\r\n
http://tacticaldictionary.com/approve
\r\n";

    self::configMail(self::$dan_email, $subject, $plainContent, $body, $recipients);
  }

  public static function sendFeedbackEmail($feedback)
  {
    $recipientsArray = array(self::$my_email, self::$dan_email);
    $recipients = implode(',', $recipientsArray);
  	$subject = '[Wiki] - New feedback arrived';

    $body = '<strong>New feedback just arrived:</strong><br />'."\r\n";
    $body .= '<br /><br />'."\r\n";
    $body .= $feedback['text'].'<br /><br />'."\r\n";
    $body .= '<strong>Subject:</strong> '.$feedback['subject'].' <br /><br />'."\r\n";
    $body .= '<strong>From:</strong> '.$feedback['email'].' <br /><br />'."\r\n";

    $text = $feedback['text'];
    $subjectFake = $feedback['subject'];
    $email = $feedback['email'];
    $plainContent = "New feedback just arrived:\r\n\r\n
$text
\r\n\r\n
Subject: $subjectFake \r\n
Email: $email
\r\n";

    self::configMail(self::$dan_email, $subject, $plainContent, $body, $recipients);
  }

  public static function sendAdsEmail($ads)
  {
    $recipientsArray = array(self::$my_email, self::$dan_email);
    $recipients = implode(',', $recipientsArray);
  	$subject = '[Wiki] - Ads request';

    $body = '<strong>Ads request just arrived:</strong><br />'."\r\n";
    $body .= '<br /><br />'."\r\n";
    $body .= $ads['info'].'<br /><br />'."\r\n";
    $body .= '<strong>Subject:</strong> '.$ads['dates'].' - '.$ads['budget'].' <br /><br />'."\r\n";
    $body .= '<strong>From:</strong> '.$ads['name'].' - '.$ads['email'].' <br /><br />'."\r\n";

    $text = $ads['info'];
    $subjectFake = $ads['dates'].' - '.$ads['budget'];
    $from = $ads['name'].' - '.$ads['email'];
    $plainContent = "New ads request just arrived:\r\n\r\n
$text
\r\n\r\n
Subject: $subjectFake \r\n
From: $from
\r\n";

    self::configMail(self::$dan_email, $subject, $plainContent, $body, $recipients);
  }

}
?>
