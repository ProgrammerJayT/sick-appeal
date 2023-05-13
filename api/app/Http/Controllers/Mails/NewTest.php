<?php

namespace App\Http\Controllers\Mails;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class NewTest extends Controller
{
    //
    public function generatePdf($data)
    {
        // Render the view and store it in a variable
        $html = View::make('mails.test', $data)->render();

        $domPdf = new Dompdf;
        $domPdf->loadHtml($html);

        // Render the PDF
        $domPdf->render();

        // Save the PDF to disk
        $pdfPath = storage_path(ucfirst($data['type']) . ' Test.pdf');
        File::makeDirectory(dirname($pdfPath), 0755, true, true);
        file_put_contents($pdfPath, $domPdf->output());

        // Send email with the PDF file as an attachment
        Mail::send([], [], function ($message) use ($pdfPath) {
            $message->to('theanthem8@gmail.com')
                ->subject('New Test Scheduled')
                ->attach($pdfPath);
        });

        return 'PDF generated and sent via email!';
    }
}
