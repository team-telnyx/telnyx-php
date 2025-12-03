<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingTollfree\Verification;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPaginationForMessagingTollfree;
use Telnyx\MessagingTollfree\Verification\Requests\RequestCreateParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestListParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestUpdateParams;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestEgress;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestStatus;
use Telnyx\RequestOptions;

interface RequestsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RequestCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RequestCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): VerificationRequestEgress;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VerificationRequestStatus;

    /**
     * @api
     *
     * @param array<mixed>|RequestUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|RequestUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationRequestEgress;

    /**
     * @api
     *
     * @param array<mixed>|RequestListParams $params
     *
     * @return DefaultPaginationForMessagingTollfree<VerificationRequestStatus>
     *
     * @throws APIException
     */
    public function list(
        array|RequestListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPaginationForMessagingTollfree;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
