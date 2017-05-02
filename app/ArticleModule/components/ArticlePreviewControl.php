<?php
namespace App\ArticleModule\Components;

use Nette;
use App\ArticleModule\Models;

class ArticlePreviewControl extends Nette\Application\UI\Control
{
    /** @var App\ArticleModule\Models\ArticleManager */
    private $articleManager;

    public function __construct(Models\ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }

    /**
     * Renders the preview for articles
     * @return void
     */
    public function render()
    {
        $template = $this->template;

        $template->setFile(__DIR__ . '/templates/articlePreview.latte');
        $template->param = $this->articleManager->getAll([]);

        $template->render();
    }
}
