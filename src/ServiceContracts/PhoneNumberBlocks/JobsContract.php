<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumberBlocks;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockParams;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobGetResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams;
use Telnyx\PhoneNumberBlocks\Jobs\JobListResponse;
use Telnyx\RequestOptions;

interface JobsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): JobGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|JobListParams $params,
        ?RequestOptions $requestOptions = null
    ): JobListResponse;

    /**
     * @api
     *
     * @param array<mixed>|JobDeletePhoneNumberBlockParams $params
     *
     * @throws APIException
     */
    public function deletePhoneNumberBlock(
        array|JobDeletePhoneNumberBlockParams $params,
        ?RequestOptions $requestOptions = null,
    ): JobDeletePhoneNumberBlockResponse;
}
