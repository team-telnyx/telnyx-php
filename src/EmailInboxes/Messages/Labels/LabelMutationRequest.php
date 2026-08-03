<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\Labels;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Labels to add or remove. Both operations are idempotent set operations, so a retried request converges instead of failing.
 *
 * @phpstan-type LabelMutationRequestShape = array{labels: list<string>}
 */
final class LabelMutationRequest implements BaseModel
{
    /** @use SdkModel<LabelMutationRequestShape> */
    use SdkModel;

    /**
     * One or more labels. Each label is a freeform, case-sensitive string of at most 255 characters; a message or thread may carry at most 50 labels. The `telnyx:` prefix is a reserved system namespace and is rejected on customer writes.
     *
     * @var list<string> $labels
     */
    #[Required(list: 'string')]
    public array $labels;

    /**
     * `new LabelMutationRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelMutationRequest::with(labels: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelMutationRequest)->withLabels(...)
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
    public static function with(array $labels): self
    {
        $self = new self;

        $self['labels'] = $labels;

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
