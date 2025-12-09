<?php

declare(strict_types=1);

namespace Telnyx\ChannelZones;

use Telnyx\ChannelZones\ChannelZoneUpdateResponse\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChannelZoneUpdateResponseShape = array{
 *   id: string,
 *   channels: int,
 *   countries: list<string>,
 *   name: string,
 *   recordType: value-of<RecordType>,
 *   createdAt?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class ChannelZoneUpdateResponse implements BaseModel
{
    /** @use SdkModel<ChannelZoneUpdateResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public int $channels;

    /**
     * List of countries (in ISO 3166-2, capitalized) members of the billing channel zone.
     *
     * @var list<string> $countries
     */
    #[Required(list: 'string')]
    public array $countries;

    #[Required]
    public string $name;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * ISO 8601 formatted date of when the channel zone was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * ISO 8601 formatted date of when the channel zone was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * `new ChannelZoneUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelZoneUpdateResponse::with(
     *   id: ..., channels: ..., countries: ..., name: ..., recordType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelZoneUpdateResponse)
     *   ->withID(...)
     *   ->withChannels(...)
     *   ->withCountries(...)
     *   ->withName(...)
     *   ->withRecordType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $countries
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $id,
        int $channels,
        array $countries,
        string $name,
        RecordType|string $recordType,
        ?string $createdAt = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['channels'] = $channels;
        $self['countries'] = $countries;
        $self['name'] = $name;
        $self['recordType'] = $recordType;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withChannels(int $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    /**
     * List of countries (in ISO 3166-2, capitalized) members of the billing channel zone.
     *
     * @param list<string> $countries
     */
    public function withCountries(array $countries): self
    {
        $self = clone $this;
        $self['countries'] = $countries;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the channel zone was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the channel zone was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
