<?php
/**
 * @package ImpressPages
 *
 */
namespace Plugin\Trustpilot\Widget\Trustpilot;


class Controller extends \Ip\WidgetController
{
    const DEFAULT_COUNT = 3;

    public function getTitle() {
        return __('Trustpilot', 'Trustpilot');
    }

    public function generateHtml($revisionId, $widgetId, $data, $skin) {

        $data['widgetId'] = $widgetId;
        $domainId = ipGetOption('Trustpilot.domainId');

        if (empty($domainId)) {
            return '<div>Please open plugin <a href="' . ipActionurl(array('aa' => 'Plugins.index')) . '#/hash=&plugin=Trustpilot">options page</a> and enter TrustPilot domain ID.</div>';
        }


        $reviewLimit = isset($data['numberOfReviews']) ? $data['numberOfReviews'] : self::DEFAULT_COUNT;

        $storage = new \Plugin\Trustpilot\Storage();
        $trustpilot = new \Plugin\Trustpilot\Trustpilot\Trustpilot($domainId, $storage);
        $allReviews = $trustpilot->getReviews();
        $data['reviews'] = array_slice($allReviews, 1, $reviewLimit);
        $data['trustpilot'] = $trustpilot;

        return parent::generateHtml($revisionId, $widgetId, $data, $skin);
    }

    public function adminHtmlSnippet() {

        $form = new \Ip\Form();
        $form->addClass('ipsTrustpilotForm');

        $field = new \Ip\Form\Field\Text(
            array(
                'name' => 'numberOfReviews',
                'label' => __('Number of reviews:', 'Trustpilot'),
                'hint' => __('Number of reviews to display', 'Trustpilot'),
                'validators' => array('Required')
            ));

        $form->addField($field);

        $variables = array('form' => $form);

        return ipView('snippet/edit.php', $variables)->render();
    }

}
