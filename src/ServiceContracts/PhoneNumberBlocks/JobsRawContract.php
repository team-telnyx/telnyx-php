<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumberBlocks;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumberBlocks\Jobs\Job;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockParams;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobGetResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JobsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the Phone Number Blocks Job
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|JobListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<Job>>
     *
     * @throws APIException
     */
    public function list(
        array|JobListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|JobDeletePhoneNumberBlockParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JobDeletePhoneNumberBlockResponse>
     *
     * @throws APIException
     */
    public function deletePhoneNumberBlock(
        array|JobDeletePhoneNumberBlockParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
