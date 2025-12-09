<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
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
    #[Optional(list: ExternalConnectionPhoneNumber::class)]
    public ?array $data;

    #[Optional]
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
     *   acquiredCapabilities?: list<value-of<AcquiredCapability>>|null,
     *   civicAddressID?: string|null,
     *   displayedCountryCode?: string|null,
     *   locationID?: string|null,
     *   numberID?: string|null,
     *   telephoneNumber?: string|null,
     *   ticketID?: string|null,
     * }> $data
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        ExternalVoiceIntegrationsPaginationMeta|array|null $meta = null,
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<ExternalConnectionPhoneNumber|array{
     *   acquiredCapabilities?: list<value-of<AcquiredCapability>>|null,
     *   civicAddressID?: string|null,
     *   displayedCountryCode?: string|null,
     *   locationID?: string|null,
     *   numberID?: string|null,
     *   telephoneNumber?: string|null,
     *   ticketID?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param ExternalVoiceIntegrationsPaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(
        ExternalVoiceIntegrationsPaginationMeta|array $meta
    ): self {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
