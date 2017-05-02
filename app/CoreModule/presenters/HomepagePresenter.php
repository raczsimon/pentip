<?php

namespace App\CoreModule\Presenters;

use Nette;
use App\ArticleModule;

class HomepagePresenter extends Nette\Application\UI\Presenter
{
    private $articlePreviewControl;

    public function __construct(ArticleModule\Components\ArticlePreviewControl $articlePreviewControl)
    {
        $this->articlePreviewControl = $articlePreviewControl;
    }

    public function renderDefault()
    {
        $this->addComponent($this->articlePreviewControl, 'articlePreview');
    }
}
