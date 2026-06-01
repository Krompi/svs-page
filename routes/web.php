<?php

use App\Http\Controllers\ArticleDisplayController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\EventDisplayController;
use App\Http\Controllers\PageDisplayController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('s3-test', function () {
//     // Den S3-Disk auswählen
    $disk = Storage::disk('s3');


    // Einen eindeutigen Testdateinamen generieren
    $testFileName = 'test-connection-' . time() . '.txt';
    $testContent = 'Dies ist eine Testdatei, um die S3-Verbindung zu überprüfen.';

    try {
        // Datei hochladen (mit öffentlicher Sichtbarkeit)
        $disk->put($testFileName, $testContent, 'public');
        echo "Datei erfolgreich hochgeladen: " . $testFileName . "\n";

        // Öffentliche URL der Datei abrufen
        $url = $disk->url($testFileName);
        echo "Öffentliche URL der Datei: " . $url . "\n";

        // Inhalt der Datei lesen (optional)
        $readContent = $disk->get($testFileName);
        echo "Inhalt der Datei: " . $readContent . "\n";

        // Datei löschen (auskommentiert, damit du die URL im Browser prüfen kannst)
        // $disk->delete($testFileName);
        echo "Datei wurde NICHT gelöscht, damit die URL erreichbar bleibt.\n";

        echo "S3-Verbindungstest erfolgreich!\n";
        dd($disk->allFiles());

    } catch (\Exception $e) {
        echo "S3-Verbindungstest fehlgeschlagen: " . $e->getMessage() . "\n";
        echo "Bitte überprüfe deine Umgebungsvariablen (AWS_BUCKET, AWS_ENDPOINT, AWS_DEFAULT_REGION, STORAGE_KEY, STORAGE_SECRET) und die Bucket-Berechtigungen in Laravel Cloud.\n";
        }
    }
    
);

Route::get('/', [\App\Http\Controllers\PageDisplayController::class, 'home'])->name('frontend.home');

Route::post('/kontakt-anfrage', [ContactFormController::class, 'submit'])->name('contact.submit');

Route::get('/articles/{slug}', [ArticleDisplayController::class, 'show'])->name('articles.show');
Route::get('/articles', [ArticleDisplayController::class, 'index'])->name('articles.index');

Route::get('/events/{slug}', [EventDisplayController::class, 'show'])->name('events.show');
Route::get('/events', [EventDisplayController::class, 'index'])->name('events.index');

Route::get('{slug}', [PageDisplayController::class, 'show'])->name('frontend.page');
