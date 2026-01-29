<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters\RecursiveCluster;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NodeShape = array{filename: string, text: string}
 */
final class Node implements BaseModel
{
    /** @use SdkModel<NodeShape> */
    use SdkModel;

    /**
     * The corresponding source file of your embedded storage bucket that the node is from.
     */
    #[Required]
    public string $filename;

    /**
     * The text of the node.
     */
    #[Required]
    public string $text;

    /**
     * `new Node()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Node::with(filename: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Node)->withFilename(...)->withText(...)
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
     */
    public static function with(string $filename, string $text): self
    {
        $self = new self;

        $self['filename'] = $filename;
        $self['text'] = $text;

        return $self;
    }

    /**
     * The corresponding source file of your embedded storage bucket that the node is from.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    /**
     * The text of the node.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
