<?php
namespace App\ArticleModule\Components;

use Nette;
use App\ArticleModule\Models;

class ArticlePreviewControl extends Nette\Application\UI\Control
{
    /** @var App\ArticleModule\Models\ArticleManager */
    private $articleManager;

    /** @var App\ArticleModule\Models\RatingManager */
    private $ratingManager;

    public function __construct(Models\ArticleManager $articleManager, Models\RatingManager $ratingManager)
    {
        $this->articleManager = $articleManager;
        $this->ratingManager = $ratingManager;
    }

    /**
     * Renders the preview for articles
     * @return void
     */
    public function render()
    {
        $template = $this->template;

        $template->setFile(__DIR__ . '/templates/articlePreview.latte');
        $template->addFilter('formatTimeByString', function ($s) {
            $this->formatTimeByChars($s);
        });

        $template->articles = $this->articleManager->getAll([]);
        $template->ratingManager = $this->ratingManager;

        $template->render();
    }

    /**
     * Get formated time to read an article
     */
    public function formatTimeByChars($string)
    {
        $seconds = strlen($string)/12;

        if ($seconds < 60)
            echo round($seconds) . ' s';
        else
            echo round($seconds/60) . ' min';
    }
}
