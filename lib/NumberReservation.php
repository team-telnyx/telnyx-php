<?php

namespace Telnyx;

/**
 * Class NumberReservation
 *
 * @package Telnyx
 */
class NumberReservation extends ApiResource
{
    const OBJECT_NAME = "number_reservation";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update; // 2020-08-20 NOTE: Does this capability still exist?

    /**
     * List all phone numbers associated with a messaging profile.
     *
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return
     */
    public function actions_extend($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/actions/extend';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
