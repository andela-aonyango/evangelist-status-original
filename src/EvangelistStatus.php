<?php

class EvangelistStatus
{
    private $status;

    public function __construct($username)
    {
        $this->setStatus($username);
    }

    private function setStatus($username)
    {
        $url = 'https://api.github.com/users/';
        $json = $this->getGithubInfo($url . $username);
        $obj = json_decode($json);
        $repos = $obj->{'public_repos'};

        if ($repos >= 5 && $repos <= 10) {
            $this->status = "Prodigal Junior Evangelist";
        }
        elseif ($repos >=11 && $repos <= 20) {
            $this->status = "Associate Evangelist";
        }
        elseif ($repos > 20) {
            $this->status = "Senior Evangelist";
        }
        else {
            $this->status = "You call yourself a programmer?!!";
        }
    }

    public function getStatus()
    {
        return $this->status;
    }

    private function getGithubInfo($url) {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, "evangelist_status");
        $content = curl_exec($curl_handle);
        curl_close($curl_handle);
        return $content;
    }
}
