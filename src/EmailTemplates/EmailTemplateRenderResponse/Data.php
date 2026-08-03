<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates\EmailTemplateRenderResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailTemplates\EmailTemplate\RecordType;

/**
 * Template object with `subject`, `html_body`, and `text_body` replaced by their Liquid-rendered values. All other template fields (id, name, variables, etc.) remain unchanged.
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   htmlBody: string|null,
 *   name: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   subject: string|null,
 *   textBody: string|null,
 *   updatedAt: \DateTimeInterface,
 *   variables: list<string>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('html_body')]
    public ?string $htmlBody;

    #[Required]
    public string $name;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    #[Required]
    public ?string $subject;

    #[Required('text_body')]
    public ?string $textBody;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /** @var list<string> $variables */
    #[Required(list: 'string')]
    public array $variables;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   createdAt: ...,
     *   htmlBody: ...,
     *   name: ...,
     *   recordType: ...,
     *   subject: ...,
     *   textBody: ...,
     *   updatedAt: ...,
     *   variables: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withHTMLBody(...)
     *   ->withName(...)
     *   ->withRecordType(...)
     *   ->withSubject(...)
     *   ->withTextBody(...)
     *   ->withUpdatedAt(...)
     *   ->withVariables(...)
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<string> $variables
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        ?string $htmlBody,
        string $name,
        RecordType|string $recordType,
        ?string $subject,
        ?string $textBody,
        \DateTimeInterface $updatedAt,
        array $variables,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['htmlBody'] = $htmlBody;
        $self['name'] = $name;
        $self['recordType'] = $recordType;
        $self['subject'] = $subject;
        $self['textBody'] = $textBody;
        $self['updatedAt'] = $updatedAt;
        $self['variables'] = $variables;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withHTMLBody(?string $htmlBody): self
    {
        $self = clone $this;
        $self['htmlBody'] = $htmlBody;

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

    public function withSubject(?string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    public function withTextBody(?string $textBody): self
    {
        $self = clone $this;
        $self['textBody'] = $textBody;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param list<string> $variables
     */
    public function withVariables(array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }
}
