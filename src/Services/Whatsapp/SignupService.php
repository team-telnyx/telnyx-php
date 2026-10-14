<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\SignupContract;
use Telnyx\Whatsapp\Signup\SignupGetStatusResponse;
use Telnyx\Whatsapp\Signup\SignupListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SignupService implements SignupContract
{
    /**
     * @api
     */
    public SignupRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SignupRawService($client);
    }

    /**
     * @api
     *
     * List finished WhatsApp Embedded Signup sessions, with status `SUCCESS` or `FAILURE`, newest first. Use the `errors` of a failed session to see why provisioning stopped.
     *
     * @param \DateTimeInterface $filterCreatedAtGte Return sessions created at or after this time (RFC 3339)
     * @param \DateTimeInterface $filterCreatedAtLte Return sessions created at or before this time (RFC 3339)
     * @param string $filterCustomerID Filter by the tech provider customer reference
     * @param string $filterWabaID Filter by Meta WABA ID
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<SignupListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?\DateTimeInterface $filterCreatedAtGte = null,
        ?\DateTimeInterface $filterCreatedAtLte = null,
        ?string $filterCustomerID = null,
        ?string $filterWabaID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'filterCreatedAtGte' => $filterCreatedAtGte ?? Omitted::VALUE,
                'filterCreatedAtLte' => $filterCreatedAtLte ?? Omitted::VALUE,
                'filterCustomerID' => $filterCustomerID ?? Omitted::VALUE,
                'filterWabaID' => $filterWabaID ?? Omitted::VALUE,
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the current state and status of a WhatsApp Embedded Signup session.
     *
     * @param string $id Signup session ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SignupGetStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStatus($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
