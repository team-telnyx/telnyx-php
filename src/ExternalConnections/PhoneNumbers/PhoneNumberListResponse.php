<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalVoiceIntegrationsPaginationMeta;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber\AcquiredCapability;

/**
 * @phpstan-type PhoneNumberListResponseShape = array{
 *   data?: list<ExternalConnectionPhoneNumber>|null,
 *   meta?: ExternalVoiceIntegrationsPaginationMeta|null,
 * }
 */
final class PhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<ExternalConnectionPhoneNumber>|null $data */
    #[Api(list: ExternalConnectionPhoneNumber::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?ExternalVoiceIntegrationsPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ExternalConnectionPhoneNumber|array{
     *   acquired_capabilities?: list<value-of<AcquiredCapability>>|null,
     *   civic_address_id?: string|null,
     *   displayed_country_code?: string|null,
     *   location_id?: string|null,
     *   number_id?: string|null,
     *   telephone_number?: string|null,
     *   ticket_id?: string|null,
     * }> $data
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        ExternalVoiceIntegrationsPaginationMeta|array|null $meta = null,
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<ExternalConnectionPhoneNumber|array{
     *   acquired_capabilities?: list<value-of<AcquiredCapability>>|null,
     *   civic_address_id?: string|null,
     *   displayed_country_code?: string|null,
     *   location_id?: string|null,
     *   number_id?: string|null,
     *   telephone_number?: string|null,
     *   ticket_id?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(
        ExternalVoiceIntegrationsPaginationMeta|array $meta
    ): self {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
