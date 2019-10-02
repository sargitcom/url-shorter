<?php

namespace App\Http\Repository;

class UrlRepository
{
    public function createLink(string $link) : int
    {
        $sql = <<<QUERY
insert links (
    link_text
) values (
    :link_text
)
QUERY;

        $bindings = [
            ':link_text' => $link
        ];

        \DB::insert($sql, $bindings);

        $linkId = \DB::getPdo()->lastInsertId();

        return $linkId;
    }

    public function getLinkById(int $linkId)
    {
        $sql = <<<QUERY
select link_text from links where link_id = :link_id
QUERY;

        $bindings = [
            ':link_id' => $linkId
        ];

        $result = \DB::selectOne($sql, $bindings);

        if (empty($result)) {
            throw new \Exception("No such link exists!");
        }

        return $result->link_text;
    }
}
