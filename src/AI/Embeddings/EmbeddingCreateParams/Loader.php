<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingCreateParams;

/**
 * Supported types of custom document loaders for embeddings.
 */
enum Loader: string
{
    case DEFAULT = 'default';

    case INTERCOM = 'intercom';
}
