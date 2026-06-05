<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallReasons\CallReasonListParams;
use Telnyx\CallReasons\CallReasonListResponse;
use Telnyx\CallReasons\CallReasonValidateParams;
use Telnyx\CallReasons\CallReasonValidateResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallReasonsRawContract;

/**
 * Static reference values the API accepts: call reasons, document types, rejection types.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallReasonsRawService implements CallReasonsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Telnyx maintains a library of pre-vetted call-reason phrases (e.g. "Appointment reminders", "Billing inquiries") that carry through DIR vetting smoothly. You can use any string that fits your use case in `DirCreateRequest.call_reasons`, but matching one of these reduces the chance the vetting team flags the phrasing for clarification.
     *
     * @param array{pageNumber?: int, pageSize?: int}|CallReasonListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<CallReasonListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|CallReasonListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallReasonListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'call_reasons',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: CallReasonListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Check up to 10 candidate `call_reasons` strings against Telnyx's vetting heuristics before sending them on a DIR create or update. The endpoint flags strings that are likely to be rejected during vetting (too generic, banned phrases, length issues, etc.) so you can fix them up front.
     *
     * @param array{body: list<string>}|CallReasonValidateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallReasonValidateResponse>
     *
     * @throws APIException
     */
    public function validate(
        array|CallReasonValidateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallReasonValidateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'call_reasons/validate',
            body: $parsed['body'],
            options: $options,
            convert: CallReasonValidateResponse::class,
        );
    }
}
