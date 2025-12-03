<?php

declare(strict_types=1);

namespace Telnyx\ChannelZones;

use Telnyx\ChannelZones\ChannelZoneListResponse\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ChannelZoneListResponseShape = array{
 *   id: string,
 *   channels: int,
 *   countries: list<string>,
 *   name: string,
 *   record_type: value-of<RecordType>,
 *   created_at?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class ChannelZoneListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ChannelZoneListResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public int $channels;

    /**
     * List of countries (in ISO 3166-2, capitalized) members of the billing channel zone.
     *
     * @var list<string> $countries
     */
    #[Api(list: 'string')]
    public array $countries;

    #[Api]
    public string $name;

    /** @var value-of<RecordType> $record_type */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * ISO 8601 formatted date of when the channel zone was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * ISO 8601 formatted date of when the channel zone was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * `new ChannelZoneListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelZoneListResponse::with(
     *   id: ..., channels: ..., countries: ..., name: ..., record_type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelZoneListResponse)
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
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        string $id,
        int $channels,
        array $countries,
        string $name,
        RecordType|string $record_type,
        ?string $created_at = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->channels = $channels;
        $obj->countries = $countries;
        $obj->name = $name;
        $obj['record_type'] = $record_type;

        null !== $created_at && $obj->created_at = $created_at;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj->channels = $channels;

        return $obj;
    }

    /**
     * List of countries (in ISO 3166-2, capitalized) members of the billing channel zone.
     *
     * @param list<string> $countries
     */
    public function withCountries(array $countries): self
    {
        $obj = clone $this;
        $obj->countries = $countries;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the channel zone was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the channel zone was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
