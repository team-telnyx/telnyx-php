<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory\Namespaces;

use Telnyx\AI\Memory\Namespaces\Profiles\ProfileDeleteParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileDeleteResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileGetSummaryResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileListParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileListResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRecallParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRecallResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRememberParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRememberResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRetrieveSummaryParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ProfilesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ProfileListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ProfileListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $namespace,
        array|ProfileListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $profileID the profile: your identifier for the user, caller or agent this memory is about
     * @param array<string,mixed>|ProfileDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $profileID,
        array|ProfileDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $profileID Path param
     * @param array<string,mixed>|ProfileIngestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileIngestResponse>
     *
     * @throws APIException
     */
    public function ingest(
        string $profileID,
        array|ProfileIngestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $profileID Path param
     * @param array<string,mixed>|ProfileRecallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileRecallResponse>
     *
     * @throws APIException
     */
    public function recall(
        string $profileID,
        array|ProfileRecallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $profileID Path param
     * @param array<string,mixed>|ProfileRememberParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileRememberResponse>
     *
     * @throws APIException
     */
    public function remember(
        string $profileID,
        array|ProfileRememberParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $profileID the profile: your identifier for the user, caller or agent this memory is about
     * @param array<string,mixed>|ProfileRetrieveSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileGetSummaryResponse>
     *
     * @throws APIException
     */
    public function retrieveSummary(
        string $profileID,
        array|ProfileRetrieveSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
