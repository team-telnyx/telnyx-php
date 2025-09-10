<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingCreateParams;

/**
 * Supported models to vectorize and embed documents.
 */
enum EmbeddingModel: string
{
    case THENLPER_GTE_LARGE = 'thenlper/gte-large';

    case INTFLOAT_MULTILINGUAL_E5_LARGE = 'intfloat/multilingual-e5-large';
}
