<?php 
require_once("ad_data.php");
require_once "../vendor/autoload.php";

if($_POST["email"] != "" && $_POST["category"] != "" && $_POST["header"] != "" && $_POST["ad"] != "")
{
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API Implementation');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
    $client->setAuthConfig('../credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    $service = new Google_Service_Sheets($client);
    $spreadsheetId = "1iQNHHfw_hlXLRC7V-L01yqDx9zp6vDFZfshnbhcO7HQ";

    $val_range = "AdInfoSheet!A:D";
    $values = [[
        $_POST["category"], $_POST["email"], $_POST["header"], $_POST["ad"]
    ]];
    $body = new Google_Service_Sheets_ValueRange(['values' => $values]);
    $params = ['valueInputOption' => 'RAW'];
    $append_sheet = $service->spreadsheets_values->append($spreadsheetId, $val_range, $body, $params);
}

header('Location: ../index.php');
?>