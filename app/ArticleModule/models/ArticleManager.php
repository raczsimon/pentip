<?php
namespace App\ArticleModule\Models;

use CoreModule;

/**
 * Handles all data requests for articles and related
 * @author Šimon Rácz <rilakkasei@gmail.com>
 */
class ArticleManager extends CoreModule\Models\SuperManager
{
    /** TABLE NAME **/
    const TBNM = 'articles';

    /**
     * Get all the articles.
     * You have an option to filter them via parameters.
     * @param array $options filter settings (order, limit, offset)
     * @return Nette\Database\Selection
     */
    public function getAll($options) {
        $request = $this->database->table(self::TBNM);

        if (self::check($options['order'])) {
            $request->order($options['order']);
        }

        if (self::check($options['offset'])) {
            $request->limit($options['limit'], $option['offset']);
        }

        if (self::check($option['limit'])) {
            $request->limit($option['limit']);
        }

        return $request;
    }

    /**
     * Get an article by SEF
     * @param string $sef Identification by SEF (pretty-URL)
     * @return Nette\Database\Table\ActiveRow
     */
    public function getBySef($sef) {
        $request = $this->database->table(self:TBNM);

        $request->where('self', $sef);
        $request->fetch();

        return $request;
    }
}
