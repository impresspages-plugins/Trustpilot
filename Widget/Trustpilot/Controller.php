<?php
/**
 * @package ImpressPages
 *
 */
namespace Plugin\Trustpilot\Widget\Trustpilot;


class Controller extends \Ip\WidgetController
{

    public function getTitle() {
        return __('Trustpilot', 'Trustpilot');
    }

    public function generateHtml($revisionId, $widgetId, $data, $skin) {

        $data['widgetId'] = $widgetId;
        $domainId = ipGetOption('Trustpilot.domainId');
        $data['reviewLimit'] = isset($data['numberOfReviews']) ? $data['numberOfReviews'] : 3;

        if ($domainId) {
            $storage = new \Plugin\Trustpilot\Storage();
            $trustpilot = new \Plugin\Trustpilot\Trustpilot\Trustpilot($domainId, $storage);
            $data['review'] = $trustpilot->getReviews();
            $data['trustpilot'] = $trustpilot;
        }

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
