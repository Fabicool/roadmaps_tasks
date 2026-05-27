<?php
namespace Fabicool\ApiRoadmap\Api;

interface NewsletterManagementInterface
{
    /**
     * @param string $email
     * @param string $phone
     * @param string $birthday
     * @return string
     */
    public function subscribe($email, $phone, $birthday);
}
