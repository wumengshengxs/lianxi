<?php
/**
 * PHP邮件发送 包下载地址 composer require phpmailer/phpmailer
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PHPEmail
{

    /**
     * @param $title
     * @param $body
     * @return array
     */
    public function email($title,$body)
    {
        $mail = new PHPMailer(true);
        try {
            //服务器配置
            $mail->CharSet ="UTF-8";                     //设定邮件编码
            $mail->SMTPDebug = 0;                        // 调试模式输出
            $mail->isSMTP();                             // 使用SMTP
            $mail->Host = 'smtp.exmail.qq.com';                // SMTP服务器
            $mail->SMTPAuth = true;                      // 允许 SMTP 认证
            $mail->Username = 'lihongfei@squirrelf.com';                // SMTP 用户名  即邮箱的用户名
            $mail->Password = 'Lhf123456..';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
            $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
            $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

            $mail->setFrom('lihongfei@squirrelf.com', 'LHF');  //发件人
            $mail->addAddress('liuzuyu@squirrelf.com', 'ZUYU');  // 收件人
            //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
            $mail->addReplyTo('lihongfei@squirrelf.com', 'LHF'); //回复的时候回复给哪个邮箱 建议和发件人一致
            //$mail->addCC('cc@example.com');                    //抄送
            //$mail->addBCC('bcc@example.com');                    //密送

            //发送附件
            // $mail->addAttachment('../xy.zip');         // 添加附件
            // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

            //Content
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = $title;
            $mail->Body    = $body;
//            $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

            $mail->send();
            return ['status'=>200,'msg'=>'发送成功'];
        } catch (Exception $e) {
            return ['status'=>100,'msg'=>'邮件发送失败: ', $mail->ErrorInfo];
        }
    }


}