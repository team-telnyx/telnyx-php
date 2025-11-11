<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse;
use Telnyx\RequestOptions;

interface MessagingContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MessagingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MessagingListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingDeleteResponse;
}
