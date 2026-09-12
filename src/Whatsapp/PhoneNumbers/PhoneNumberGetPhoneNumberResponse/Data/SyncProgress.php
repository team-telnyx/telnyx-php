<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\PhoneNumberGetPhoneNumberResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Synchronization progress. This object is returned only while a coexistence number is synchronizing.
 *
 * @phpstan-type SyncProgressShape = array{
 *   contactsStatus?: string|null,
 *   historyChunkOrder?: int|null,
 *   historyPhase?: int|null,
 *   historyProgress?: int|null,
 *   historyStatus?: string|null,
 * }
 */
final class SyncProgress implements BaseModel
{
    /** @use SdkModel<SyncProgressShape> */
    use SdkModel;

    #[Optional('contacts_status')]
    public ?string $contactsStatus;

    #[Optional('history_chunk_order', nullable: true)]
    public ?int $historyChunkOrder;

    #[Optional('history_phase', nullable: true)]
    public ?int $historyPhase;

    #[Optional('history_progress', nullable: true)]
    public ?int $historyProgress;

    #[Optional('history_status')]
    public ?string $historyStatus;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        int|Omitted|null $historyChunkOrder = Omitted::VALUE,
        int|Omitted|null $historyPhase = Omitted::VALUE,
        int|Omitted|null $historyProgress = Omitted::VALUE,
        ?string $contactsStatus = null,
        ?string $historyStatus = null,
    ): self {
        $self = new self;

        null !== $contactsStatus && $self['contactsStatus'] = $contactsStatus;
        Omitted::VALUE !== $historyChunkOrder && $self['historyChunkOrder'] = $historyChunkOrder;
        Omitted::VALUE !== $historyPhase && $self['historyPhase'] = $historyPhase;
        Omitted::VALUE !== $historyProgress && $self['historyProgress'] = $historyProgress;
        null !== $historyStatus && $self['historyStatus'] = $historyStatus;

        return $self;
    }

    public function withContactsStatus(string $contactsStatus): self
    {
        $self = clone $this;
        $self['contactsStatus'] = $contactsStatus;

        return $self;
    }

    public function withHistoryChunkOrder(?int $historyChunkOrder): self
    {
        $self = clone $this;
        $self['historyChunkOrder'] = $historyChunkOrder;

        return $self;
    }

    public function withHistoryPhase(?int $historyPhase): self
    {
        $self = clone $this;
        $self['historyPhase'] = $historyPhase;

        return $self;
    }

    public function withHistoryProgress(?int $historyProgress): self
    {
        $self = clone $this;
        $self['historyProgress'] = $historyProgress;

        return $self;
    }

    public function withHistoryStatus(string $historyStatus): self
    {
        $self = clone $this;
        $self['historyStatus'] = $historyStatus;

        return $self;
    }
}
