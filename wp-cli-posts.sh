!/bin/bash

# Lives in bluehost/public_html
# CSV file path
CSV_FILE="posts.csv"

# Skip header line and process each row
tail -n +2 "$CSV_FILE" | while IFS=',' read -r filename title bookname date
do
    # Remove any quotes that might be in the CSV
    filename=$(echo "$filename" | tr -d '"')
    title=$(echo "$title" | tr -d '"')
    bookname=$(echo "$bookname" | tr -d '"')
    date=$(echo "$date" | tr -d '"')

    echo "Creating post: $title"

    wp post create \
        --post_author='1' \
        --post_content='<!-- wp:audio --><figure class="wp-block-audio"><audio
src="https://calvarychapelgrangeville.com/media/'"$filename"'.mp3"
controls="controls"></audio></figure><!-- /wp:audio -->' \
        --post_title="$title" \
        --post_status="publish" \
        --post_category="$bookname" \
        --post_date="$date"

    if [ $? -eq 0 ]; then
        echo "▒^▒^▒ Successfully created: $title"
    else
        echo "▒^▒^▒ Failed to create: $title"
    fi
    echo "---"
done

echo "Bulk post creation completed!"
