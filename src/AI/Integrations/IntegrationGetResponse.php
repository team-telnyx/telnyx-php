<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations;

use Telnyx\AI\Integrations\IntegrationGetResponse\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegrationGetResponseShape = array{
 *   id: string,
 *   availableTools: list<string>,
 *   description: string,
 *   displayName: string,
 *   logoURL: string,
 *   name: string,
 *   status: value-of<Status>,
 * }
 */
final class IntegrationGetResponse implements BaseModel
{
    /** @use SdkModel<IntegrationGetResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<string> $availableTools */
    #[Required('available_tools', list: 'string')]
    public array $availableTools;

    #[Required]
    public string $description;

    #[Required('display_name')]
    public string $displayName;

    #[Required('logo_url')]
    public string $logoURL;

    #[Required]
    public string $name;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * `new IntegrationGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationGetResponse::with(
     *   id: ...,
     *   availableTools: ...,
     *   description: ...,
     *   displayName: ...,
     *   logoURL: ...,
     *   name: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationGetResponse)
     *   ->withID(...)
     *   ->withAvailableTools(...)
     *   ->withDescription(...)
     *   ->withDisplayName(...)
     *   ->withLogoURL(...)
     *   ->withName(...)
     *   ->withStatus(...)
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
     * @param list<string> $availableTools
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        array $availableTools,
        string $description,
        string $displayName,
        string $logoURL,
        string $name,
        Status|string $status,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['availableTools'] = $availableTools;
        $self['description'] = $description;
        $self['displayName'] = $displayName;
        $self['logoURL'] = $logoURL;
        $self['name'] = $name;
        $self['status'] = $status;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<string> $availableTools
     */
    public function withAvailableTools(array $availableTools): self
    {
        $self = clone $this;
        $self['availableTools'] = $availableTools;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withLogoURL(string $logoURL): self
    {
        $self = clone $this;
        $self['logoURL'] = $logoURL;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
