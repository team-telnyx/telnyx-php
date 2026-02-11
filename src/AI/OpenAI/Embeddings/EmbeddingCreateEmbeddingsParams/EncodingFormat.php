<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Embeddings\EmbeddingCreateEmbeddingsParams;

/**
 * The format to return the embeddings in.
 */
enum EncodingFormat: string
{
    case FLOAT = 'float';

    case BASE64 = 'base64';
}
