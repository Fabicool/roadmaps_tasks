<?php
namespace Fabicool\ApiRoadmap\Model;

use Fabicool\ApiRoadmap\Api\NewsletterManagementInterface;
use Magento\Newsletter\Model\SubscriberFactory;
use Magento\Webapi\Model\Service\Context;
use Magento\Framework\Exception\LocalizedException;

class NewsletterManagement implements NewsletterManagementInterface
{
    /**
     * @param SubscriberFactory $subscriberFactory
     * @param Context $serviceContext
     */
    public function __construct(
        protected SubscriberFactory $subscriberFactory,
        protected Context           $serviceContext
    ) {
    }

    /**
     * Create user subscription with custom fields (phone, birthday) via REST API
     *
     * @param $email
     * @param $phone
     * @param $birthday
     * @return string
     */
    public function subscribe($email, $phone, $birthday) {
        try {
            $subscriber = $this->subscriberFactory->create()->loadByCustomerId(
                $this->serviceContext->getUserId() //get sub by customer id
            );
            if ($subscriber->getId() && $subscriber->isSubscribed()) {
                return "Email is already subscribed.";
            }

            $subscriber->subscribe($email);
            //Додаємо кастомні дані перед збереженням
            $subscriber->setData('phone', $phone);
            $subscriber->setData('birthday', $birthday);
            $subscriber->save();

            return "Subscription successful!";
        } catch (\Exception $e) {
            throw new LocalizedException(__("Something went wrong with the subscription."));
        }
    }
}
