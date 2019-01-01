<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Custom\InvoiceHelper;
use App\Custom\ClientHelper;
use App\Custom\MailHelper;

use Carbon\Carbon;

class LatePaymentNotice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'latepayment:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will notify companies of late payments.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get late invoices
        $invoice_helper = new InvoiceHelper();
        $late_invoices = $invoice_helper->get_late_payment_invoices();

        // Send out emails if any late invoices
        if (count($late_invoices) > 0) {
            foreach($late_invoices as $invoice) {
                // Check if need to send out email
                if (Carbon::parse($invoice->next_late_payment_email_date)->isToday()) {
                   // Get client data
                    $client_helper = new ClientHelper($invoice->client_id);
                    $client = $client_helper->read();

                    // Create mail data and send out email
                    $mail_data = array(
                        "sender_first_name" => "Red",
                        "sender_last_name" => "Wolf",
                        "sender_email" => env('MAIL_USERNAME'),
                        "recipient_first_name" => $client->first_name,
                        "recipient_last_name" => $client->last_name,
                        "recipient_email" => $client->email,
                        "subject" => "🐺 Red Wolf Entertainment - Overdue Invoice Notice 🐺",
                        "data_tags" => array(
                            "first_name" => $client->first_name,
                            "last_name" => $client->last_name,
                            "company_name" => $client->company_name,
                            "invoice_id" => $invoice->id,
                            "original_due_date" => $invoice->due_date,
                            "amount" => $invoice->amount,
                            "invoice_link" => url('/invoices/' . $invoice->id)
                        )
                    );
                    $mail_helper = new MailHelper($mail_data);
                    $mail_helper->send_late_payment_email();

                    // Update next email date
                    $next_late_payment_email_date = Carbon::parse($invoice->next_late_payment_email_date);
                    $new_email_date = $next_late_payment_email_date->addDays(2);
                    $invoice->next_late_payment_email_date = $new_email_date;
                    $invoice->save();
                } else {
                    echo "Not sending email\n";
                }
                
            }
        }
    }
}
