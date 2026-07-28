<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Filters\FilterNewResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Filters\FilterNewResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   allowlist: list<string>,
 *   blocklist: list<string>,
 *   recordType: RecordType|value-of<RecordType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<string> $allowlist */
    #[Required(list: 'string')]
    public array $allowlist;

    /** @var list<string> $blocklist */
    #[Required(list: 'string')]
    public array $blocklist;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(allowlist: ..., blocklist: ..., recordType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withAllowlist(...)->withBlocklist(...)->withRecordType(...)
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
     * @param list<string> $allowlist
     * @param list<string> $blocklist
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        array $allowlist,
        array $blocklist,
        RecordType|string $recordType
    ): self {
        $self = new self;

        $self['allowlist'] = $allowlist;
        $self['blocklist'] = $blocklist;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<string> $allowlist
     */
    public function withAllowlist(array $allowlist): self
    {
        $self = clone $this;
        $self['allowlist'] = $allowlist;

        return $self;
    }

    /**
     * @param list<string> $blocklist
     */
    public function withBlocklist(array $blocklist): self
    {
        $self = clone $this;
        $self['blocklist'] = $blocklist;

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
}
