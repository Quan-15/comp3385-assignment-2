namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Feedback extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public string $comment;

    public function __construct(string $name, string $email, string $comment)
    {
        $this->name = $name;
        $this->email = $email;
        $this->comment = $comment;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->email, $this->name),
            subject: 'Feedback from ' . $this->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.feedback',
        );
    }
}
