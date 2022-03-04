<?php 

class AdData {
    private string $email;
    private string $text;

    public function __construct(string $email, string $header, string $text) {
        $this->email = $email;
        $this->header = $header;
        $this->text = $text;
    }

    public function getAdInfo(): array
    {
        return array
        (
            "email" => $this->email,
            "header" => $this->header,
            "text" => $this->text
        );
    }
}
?>