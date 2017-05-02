<?php
namespace App\ArticleModule\Models;

use App\CoreModule;

/**
 * Handles all data requests for ratings of articles
 * @author Šimon Rácz <rilakkasei@gmail.com>
 */
class RatingManager extends CoreModule\Models\SuperManager
{
    /** TABLE NAME **/
    const TBNM = 'rating';

    /**
     * Get the rating of an article by its id
     * @param int $id ID of an article
     * @return int The rating
     */
    public function getById($id)
    {
        $request = $this->database->table(self::TBNM);

        $request->select('AVG(rating) AS request');
        $request->where('article_id', $id);

        $rating = $request->fetch()->request;

        return ($rating == NULL) ? 0 : $rating;
    }
}
