<?php

declare(strict_types=1);

namespace Telnyx\PortingOrderStatus\Detail;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrderStatus\Detail\Remediation\Action;
use Telnyx\PortingOrderStatus\Detail\Remediation\RequiredDocument;

/**
 * Structured remediation steps so an agent can map the exception to a fix via the API alone.
 *
 * @phpstan-type RemediationShape = array{
 *   action: Action|value-of<Action>,
 *   fields: list<string>,
 *   requiredDocument: null|RequiredDocument|value-of<RequiredDocument>,
 *   retryable: bool,
 * }
 */
final class Remediation implements BaseModel
{
    /** @use SdkModel<RemediationShape> */
    use SdkModel;

    /**
     * The type of remediation action to take.
     *
     * @var value-of<Action> $action
     */
    #[Required(enum: Action::class)]
    public string $action;

    /**
     * Patchable field paths to correct, empty when no field update applies.
     *
     * @var list<string> $fields
     */
    #[Required(list: 'string')]
    public array $fields;

    /**
     * The document to (re)upload, when applicable.
     *
     * @var value-of<RequiredDocument>|null $requiredDocument
     */
    #[Required('required_document', enum: RequiredDocument::class)]
    public ?string $requiredDocument;

    /**
     * Whether resubmission or polling alone can unblock the order.
     */
    #[Required]
    public bool $retryable;

    /**
     * `new Remediation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Remediation::with(
     *   action: ..., fields: ..., requiredDocument: ..., retryable: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Remediation)
     *   ->withAction(...)
     *   ->withFields(...)
     *   ->withRequiredDocument(...)
     *   ->withRetryable(...)
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
     * @param Action|value-of<Action> $action
     * @param list<string> $fields
     * @param RequiredDocument|value-of<RequiredDocument>|null $requiredDocument
     */
    public static function with(
        Action|string $action,
        array $fields,
        RequiredDocument|string|null $requiredDocument,
        bool $retryable,
    ): self {
        $self = new self;

        $self['action'] = $action;
        $self['fields'] = $fields;
        $self['requiredDocument'] = $requiredDocument;
        $self['retryable'] = $retryable;

        return $self;
    }

    /**
     * The type of remediation action to take.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * Patchable field paths to correct, empty when no field update applies.
     *
     * @param list<string> $fields
     */
    public function withFields(array $fields): self
    {
        $self = clone $this;
        $self['fields'] = $fields;

        return $self;
    }

    /**
     * The document to (re)upload, when applicable.
     *
     * @param RequiredDocument|value-of<RequiredDocument>|null $requiredDocument
     */
    public function withRequiredDocument(
        RequiredDocument|string|null $requiredDocument
    ): self {
        $self = clone $this;
        $self['requiredDocument'] = $requiredDocument;

        return $self;
    }

    /**
     * Whether resubmission or polling alone can unblock the order.
     */
    public function withRetryable(bool $retryable): self
    {
        $self = clone $this;
        $self['retryable'] = $retryable;

        return $self;
    }
}
