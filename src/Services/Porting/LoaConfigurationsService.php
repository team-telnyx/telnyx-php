<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Logo;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\LoaConfigurationsContract;

/**
 * Endpoints related to porting orders management.
 *
 * @phpstan-import-type AddressShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Address
 * @phpstan-import-type ContactShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Contact
 * @phpstan-import-type LogoShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Logo
 * @phpstan-import-type AddressShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address as AddressShape1
 * @phpstan-import-type ContactShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact as ContactShape1
 * @phpstan-import-type LogoShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo as LogoShape1
 * @phpstan-import-type AddressShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address as AddressShape2
 * @phpstan-import-type ContactShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact as ContactShape2
 * @phpstan-import-type LogoShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo as LogoShape2
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class LoaConfigurationsService implements LoaConfigurationsContract
{
    /**
     * @api
     */
    public LoaConfigurationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LoaConfigurationsRawService($client);
    }

    /**
     * @api
     *
     * Create a LOA configuration.
     *
     * @param Address|AddressShape $address the address of the company
     * @param string $companyName The name of the company
     * @param Contact|ContactShape $contact the contact information of the company
     * @param Logo|LogoShape $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Address|array $address,
        string $companyName,
        Contact|array $contact,
        Logo|array $logo,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): LoaConfigurationNewResponse {
        $params = Util::removeNulls(
            [
                'address' => $address,
                'companyName' => $companyName,
                'contact' => $contact,
                'logo' => $logo,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): LoaConfigurationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     * @param \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address|AddressShape1 $address the address of the company
     * @param string $companyName The name of the company
     * @param \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact|ContactShape1 $contact the contact information of the company
     * @param \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo|LogoShape1 $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address|array $address,
        string $companyName,
        \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact|array $contact,
        \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo|array $logo,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): LoaConfigurationUpdateResponse {
        $params = Util::removeNulls(
            [
                'address' => $address,
                'companyName' => $companyName,
                'contact' => $contact,
                'logo' => $logo,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the LOA configurations.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PortingLoaConfiguration>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
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
     * Delete a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Preview the LOA template that would be generated without need to create LOA configuration.
     *
     * @param \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address|AddressShape2 $address the address of the company
     * @param string $companyName The name of the company
     * @param \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact|ContactShape2 $contact the contact information of the company
     * @param \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo|LogoShape2 $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function preview0(
        \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address|array $address,
        string $companyName,
        \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact|array $contact,
        \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo|array $logo,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'address' => $address,
                'companyName' => $companyName,
                'contact' => $contact,
                'logo' => $logo,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->preview0(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Preview a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function preview1(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->preview1($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
