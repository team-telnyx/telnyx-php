<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberListParams\SortPhoneNumber;

/**
 * List all hosted numbers associated with the authenticated user.
 *
 * @see Telnyx\Services\MessagingHostedNumbersService::list()
 *
 * @phpstan-type MessagingHostedNumberListParamsShape = array{
 *   filterMessagingProfileID?: string|null,
 *   filterPhoneNumber?: string|null,
 *   filterPhoneNumberContains?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sortPhoneNumber?: null|SortPhoneNumber|value-of<SortPhoneNumber>,
 * }
 */
final class MessagingHostedNumberListParams implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by messaging profile ID.
     */
    #[Optional]
    public ?string $filterMessagingProfileID;

    /**
     * Filter by exact phone number.
     */
    #[Optional]
    public ?string $filterPhoneNumber;

    /**
     * Filter by phone number substring.
     */
    #[Optional]
    public ?string $filterPhoneNumberContains;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Sort by phone number.
     *
     * @var value-of<SortPhoneNumber>|null $sortPhoneNumber
     */
    #[Optional(enum: SortPhoneNumber::class)]
    public ?string $sortPhoneNumber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SortPhoneNumber|value-of<SortPhoneNumber>|null $sortPhoneNumber
     */
    public static function with(
        ?string $filterMessagingProfileID = null,
        ?string $filterPhoneNumber = null,
        ?string $filterPhoneNumberContains = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        SortPhoneNumber|string|null $sortPhoneNumber = null,
    ): self {
        $self = new self;

        null !== $filterMessagingProfileID && $self['filterMessagingProfileID'] = $filterMessagingProfileID;
        null !== $filterPhoneNumber && $self['filterPhoneNumber'] = $filterPhoneNumber;
        null !== $filterPhoneNumberContains && $self['filterPhoneNumberContains'] = $filterPhoneNumberContains;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sortPhoneNumber && $self['sortPhoneNumber'] = $sortPhoneNumber;

        return $self;
    }

    /**
     * Filter by messaging profile ID.
     */
    public function withFilterMessagingProfileID(
        string $filterMessagingProfileID
    ): self {
        $self = clone $this;
        $self['filterMessagingProfileID'] = $filterMessagingProfileID;

        return $self;
    }

    /**
     * Filter by exact phone number.
     */
    public function withFilterPhoneNumber(string $filterPhoneNumber): self
    {
        $self = clone $this;
        $self['filterPhoneNumber'] = $filterPhoneNumber;

        return $self;
    }

    /**
     * Filter by phone number substring.
     */
    public function withFilterPhoneNumberContains(
        string $filterPhoneNumberContains
    ): self {
        $self = clone $this;
        $self['filterPhoneNumberContains'] = $filterPhoneNumberContains;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Sort by phone number.
     *
     * @param SortPhoneNumber|value-of<SortPhoneNumber> $sortPhoneNumber
     */
    public function withSortPhoneNumber(
        SortPhoneNumber|string $sortPhoneNumber
    ): self {
        $self = clone $this;
        $self['sortPhoneNumber'] = $sortPhoneNumber;

        return $self;
    }
}
