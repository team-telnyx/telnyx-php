<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallReasons\CallReasonListResponse;
use Telnyx\CallReasons\CallReasonValidateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallReasonsContract;

/**
 * Static reference values the API accepts: call reasons, document types, rejection types.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallReasonsService implements CallReasonsContract
{
    /**
     * @api
     */
    public CallReasonsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallReasonsRawService($client);
    }

    /**
     * @api
     *
     * Telnyx maintains a library of pre-vetted call-reason phrases (e.g. "Appointment reminders", "Billing inquiries") that carry through DIR vetting smoothly. You can use any string that fits your use case in `DirCreateRequest.call_reasons`, but matching one of these reduces the chance the vetting team flags the phrasing for clarification.
     *
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Default `100` for this endpoint (the call-reason library is small and most callers want the whole list in one call). Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<CallReasonListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 100,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check up to 10 candidate `call_reasons` strings against Telnyx's vetting heuristics before sending them on a DIR create or update. The endpoint flags strings that are likely to be rejected during vetting (too generic, banned phrases, length issues, etc.) so you can fix them up front.
     *
     * @param list<string> $body **Bare JSON array** of candidate call-reason strings (NOT an object - there is no top-level `call_reasons` key on this endpoint). 1–10 strings, each ≤64 characters.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function validate(
        array $body,
        RequestOptions|array|null $requestOptions = null
    ): CallReasonValidateResponse {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->validate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
