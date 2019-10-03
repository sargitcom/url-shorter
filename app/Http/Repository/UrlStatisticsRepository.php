<?php

namespace App\Http\Repository;

class UrlStatisticsRepository
{
    public function createLinkStats($linkId, $ip, $location, $userAgent, $system)
    {
        $sql = <<<QUERY
insert link_statistics (
    link_id,
    ip,
    system,
    user_agent,
    region
) values (
    :link_id,
    :ip,
    :system,
    :user_agent,
    :region
)
QUERY;

        $bindings = [
            ':link_id' => $linkId,
            ':ip' => $ip,
            ':system' => $system,
            ':user_agent' => $userAgent,
            ':region' => $location
        ];

        \DB::insert($sql, $bindings);

        $linkId = \DB::getPdo()->lastInsertId();

        return $linkId;
    }

    public function getLinkStats(int $linkId)
    {
        $sql = <<<QUERY
select 
    link_id,
    ip,
    system,
    user_agent,
    region,
    added
from link_statistics where link_id = :link_id
QUERY;

        $bindings = [
            ':link_id' => $linkId
        ];

        $result = \DB::select($sql, $bindings);

        return $result;
    }
}
