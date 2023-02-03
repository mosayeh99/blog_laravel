<div>
    <form wire:submit.prevent="store" class="add-comments">
        <textarea name="comment_body" wire:model.defer="comment_body" placeholder="Type Comment..."></textarea>
        <input value="Add Comment" type="submit">
    </form>
</div>
