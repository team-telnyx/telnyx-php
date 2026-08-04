<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a Liquid email template. Variables are auto-extracted when omitted.
 *
 * @see Telnyx\Services\EmailTemplatesService::create()
 *
 * @phpstan-type EmailTemplateCreateParamsShape = array{
 *   name: string,
 *   htmlBody?: string|null,
 *   subject?: string|null,
 *   textBody?: string|null,
 *   variables?: list<string>|null,
 *   idempotencyKey?: string|null,
 * }
 */
final class EmailTemplateCreateParams implements BaseModel
{
    /** @use SdkModel<EmailTemplateCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Letters, numbers, spaces, hyphens, and underscores only.
     */
    #[Required]
    public string $name;

    /**
     * Liquid template HTML body.
     */
    #[Optional('html_body', nullable: true)]
    public ?string $htmlBody;

    /**
     * Liquid template subject.
     */
    #[Optional(nullable: true)]
    public ?string $subject;

    /**
     * Liquid template text body.
     */
    #[Optional('text_body', nullable: true)]
    public ?string $textBody;

    /**
     * Template variables. Auto-extracted from subject/body fields when absent.
     *
     * @var list<string>|null $variables
     */
    #[Optional(list: 'string')]
    public ?array $variables;

    #[Optional]
    public ?string $idempotencyKey;

    /**
     * `new EmailTemplateCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailTemplateCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailTemplateCreateParams)->withName(...)
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
     * @param list<string>|null $variables
     */
    public static function with(
        string $name,
        ?string $htmlBody = null,
        ?string $subject = null,
        ?string $textBody = null,
        ?array $variables = null,
        ?string $idempotencyKey = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $htmlBody && $self['htmlBody'] = $htmlBody;
        null !== $subject && $self['subject'] = $subject;
        null !== $textBody && $self['textBody'] = $textBody;
        null !== $variables && $self['variables'] = $variables;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * Letters, numbers, spaces, hyphens, and underscores only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Liquid template HTML body.
     */
    public function withHTMLBody(?string $htmlBody): self
    {
        $self = clone $this;
        $self['htmlBody'] = $htmlBody;

        return $self;
    }

    /**
     * Liquid template subject.
     */
    public function withSubject(?string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Liquid template text body.
     */
    public function withTextBody(?string $textBody): self
    {
        $self = clone $this;
        $self['textBody'] = $textBody;

        return $self;
    }

    /**
     * Template variables. Auto-extracted from subject/body fields when absent.
     *
     * @param list<string> $variables
     */
    public function withVariables(array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
