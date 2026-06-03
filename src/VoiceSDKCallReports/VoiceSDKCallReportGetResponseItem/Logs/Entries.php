<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Logs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Logs\Entries\Entry;

/**
 * Raw logs object emitted by the Voice SDK when logs are grouped under an entries field.
 *
 * @phpstan-import-type EntryShape from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Logs\Entries\Entry
 *
 * @phpstan-type EntriesShape = array{entries?: list<Entry|EntryShape>|null}
 */
final class Entries implements BaseModel
{
    /** @use SdkModel<EntriesShape> */
    use SdkModel;

    /**
     * Raw log entries when the SDK groups logs under an entries field.
     *
     * @var list<Entry>|null $entries
     */
    #[Optional(list: Entry::class)]
    public ?array $entries;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Entry|EntryShape>|null $entries
     */
    public static function with(?array $entries = null): self
    {
        $self = new self;

        null !== $entries && $self['entries'] = $entries;

        return $self;
    }

    /**
     * Raw log entries when the SDK groups logs under an entries field.
     *
     * @param list<Entry|EntryShape> $entries
     */
    public function withEntries(array $entries): self
    {
        $self = clone $this;
        $self['entries'] = $entries;

        return $self;
    }
}
