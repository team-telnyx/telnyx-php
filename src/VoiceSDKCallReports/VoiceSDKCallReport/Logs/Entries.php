<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReport\Logs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportLogEntry;

/**
 * Raw logs object emitted by the Voice SDK when logs are grouped under an entries field.
 *
 * @phpstan-import-type VoiceSDKCallReportLogEntryShape from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReportLogEntry
 *
 * @phpstan-type EntriesShape = array{
 *   entries?: list<VoiceSDKCallReportLogEntry|VoiceSDKCallReportLogEntryShape>|null,
 * }
 */
final class Entries implements BaseModel
{
    /** @use SdkModel<EntriesShape> */
    use SdkModel;

    /**
     * Raw log entries when the SDK groups logs under an entries field.
     *
     * @var list<VoiceSDKCallReportLogEntry>|null $entries
     */
    #[Optional(list: VoiceSDKCallReportLogEntry::class)]
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
     * @param list<VoiceSDKCallReportLogEntry|VoiceSDKCallReportLogEntryShape>|null $entries
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
     * @param list<VoiceSDKCallReportLogEntry|VoiceSDKCallReportLogEntryShape> $entries
     */
    public function withEntries(array $entries): self
    {
        $self = clone $this;
        $self['entries'] = $entries;

        return $self;
    }
}
