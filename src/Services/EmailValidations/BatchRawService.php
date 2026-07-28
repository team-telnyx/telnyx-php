<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailValidations;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailValidations\Batch\BatchCreateParams;
use Telnyx\EmailValidations\Batch\BatchGetResponse;
use Telnyx\EmailValidations\Batch\BatchNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailValidations\BatchRawContract;

/**
 * Validate email addresses synchronously or in asynchronous batches.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an asynchronous batch validation job for up to 1,000 email addresses.
     *
     * @param array{
     *   emails: list<string>, webhookURL?: string, idempotencyKey?: string
     * }|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_validations/batch',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: BatchNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the current status and, once completed, validation results for a batch job.
     *
     * @param string $id email validation batch UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_validations/batch/%1$s', $id],
            options: $requestOptions,
            convert: BatchGetResponse::class,
        );
    }
}
