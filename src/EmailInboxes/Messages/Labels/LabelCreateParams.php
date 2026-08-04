<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\Labels;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Adds one or more mutable labels to a message. Labels carry agent
 * workflow state such as `spam`, `needs_review`, or `processed`.
 *
 * Labels are **not** the same as the send-time `tags` on outbound
 * messages: `tags` are immutable and propagate to Email Detail Records
 * and Mission Control for billing attribution, while labels are mailbox
 * state that never reaches the reporting contract.
 *
 * The operation is an idempotent set union — adding a label the message
 * already carries is a no-op and still returns 200. Labels are
 * case-sensitive, and message labels are independent of thread labels.
 *
 * @see Telnyx\Services\EmailInboxes\Messages\LabelsService::create()
 *
 * @phpstan-type LabelCreateParamsShape = array{
 *   inboxID: string, labels: list<string>
 * }
 */
final class LabelCreateParams implements BaseModel
{
    /** @use SdkModel<LabelCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $inboxID;

    /**
     * One or more labels. Each label is a freeform, case-sensitive string of at most 255 characters; a message or thread may carry at most 50 labels. The `telnyx:` prefix is a reserved system namespace and is rejected on customer writes.
     *
     * @var list<string> $labels
     */
    #[Required(list: 'string')]
    public array $labels;

    /**
     * `new LabelCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelCreateParams::with(inboxID: ..., labels: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelCreateParams)->withInboxID(...)->withLabels(...)
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
     * @param list<string> $labels
     */
    public static function with(string $inboxID, array $labels): self
    {
        $self = new self;

        $self['inboxID'] = $inboxID;
        $self['labels'] = $labels;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    /**
     * One or more labels. Each label is a freeform, case-sensitive string of at most 255 characters; a message or thread may carry at most 50 labels. The `telnyx:` prefix is a reserved system namespace and is rejected on customer writes.
     *
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }
}
